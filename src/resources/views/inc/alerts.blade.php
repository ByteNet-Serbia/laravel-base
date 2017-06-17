
@if (! empty(session()->get('user.flash_messages')))
    {{-- Bootstrap Notifications using PNotify --}}
    <script type="text/javascript">
        jQuery( document ).ready(function() {
            setTimeout(function() {
                PNotify.prototype.options.styling = "bootstrap3";
                PNotify.prototype.options.styling = "fontawesome";

                {{--
                /*********** Positioned Stack ***********
                 * This stack is initially positioned through code instead of CSS.
                 * This is done through two extra variables. firstpos1 and firstpos2
                 * are pixel values, relative to a viewport edge. dir1 and dir2,
                 * respectively, determine which edge. It is calculated as follows:
                 *
                 * - dir = "up" - firstpos is relative to the bottom of viewport.
                 * - dir = "down" - firstpos is relative to the top of viewport.
                 * - dir = "right" - firstpos is relative to the left of viewport.
                 * - dir = "left" - firstpos is relative to the right of viewport.
                 */
                 --}}
                var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};

                @foreach(session()->get('user.flash_messages') as $flash)
                    @if ($flash->position !== 'default')
                        @continue;
                    @endif

                    new PNotify({
                        @if ($flash->title)
                        title: '{{ $flash->title }}',
                        @endif
                        @if ($flash->message)
                        text: '{!! $flash->message !!}',
                        @endif
                        type: '{{ $flash->level ?: 'notice' }}',
                        addclass: "stack-bottomright",
                        stack: stack_bottomright,
                        nonblock: {
                            nonblock: true
                        },
                        buttons: {
                            show_on_nonblock: true
                        }
                    });
                @endforeach
            }, 600);
        });
    </script>
@endif


{{--
@if (! empty(session()->get('user.flash_messages')))
    @foreach(session()->get('user.flash_messages') as $key => $flash)

        @if ($flash->position !== 'default')
            @continue;
        @endif

        <div id="flash-notification-{{ $key }}" class="alert alert-{{ $flash->level ?: 'info' }} flash-notification" role="alert" style="">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <div class="flash-message">
                @if ($flash->title)
                    <h4>{{ $flash->title }}</h4>
                @endif
                {!! $flash->message !!}
            </div>
        </div>

        <script>
            $( document ).ready(function() {
                $('#flash-notification-{{ $key }}').delay({{400 * $key }}).fadeIn('normal', function() {
                    $(this).delay(8500).fadeOut();
                });
            });
        </script>

    @endforeach
@endif
--}}
