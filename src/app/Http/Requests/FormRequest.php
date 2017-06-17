<?php
namespace ByteNet\LaravelBase\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Str;

abstract class FormRequest extends LaravelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        $transformed = [];

        foreach ($errors as $field => $message) {
            $transformed[] = [
                'field' => $field,
                'messages' => $message,
            ];
        }

        if ($this->expectsJson()) {
            //return new JsonResponse($transformed, 422);
            return response()->json([
                'errors' => $transformed
            ], IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($this->expectsXml()) {
            $xml_data = new \SimpleXMLElement('<?xml version="1.0"?><errors/>');
            $this->arrayToXml($transformed, $xml_data, 'error', false);
            $result = $xml_data->asXML();

            return response($result, IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
                ->header('Content-Type', 'application/xml');
        }

        parent::response($errors);
    }

    /**
     * Determine if the current request probably expects a XML response.
     *
     * @return bool
     */
    public function expectsXml()
    {
        return (bool) $this->wantsXml();
    }

    /**
     * Determine if the current request is asking for XML in return.
     *
     * @return bool
     */
    protected function wantsXml()
    {
        $acceptable = $this->getAcceptableContentTypes();

        return isset($acceptable[0]) && Str::contains($acceptable[0], ['/xml', '+xml']);
    }

    /**
     * Defination to convert array to XML
     *
     * @param $data
     * @param $xml_data
     * @param string $numKey
     * @param bool $isRecursiveNumKey
     */
    protected function arrayToXml($data, & $xml_data, $numKey = 'item', $isRecursiveNumKey = true) {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                //$key = 'item' . $key; //dealing with <0/>..<n/> issues
                $key = $numKey;
            }

            if (is_array($value)) {
                $recursiveNumKey = (bool) $isRecursiveNumKey ? $numKey : 'item';

                $subnode = $xml_data->addChild($key);
                $this->arrayToXml($value, $subnode, $recursiveNumKey, $isRecursiveNumKey);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
}
