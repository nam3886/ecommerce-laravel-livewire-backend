@if ($errors->any())
    <div x-data="scrollToErrorValidate()" x-init="scroll">
    </div>
@endif

@push('scripts')
    @once
        <script>
            function scrollToErrorValidate() {
                return {
                    element: '.error-validate',
                    scroll: function() {
                        const e = document.querySelector(this.element);

                        e?.scrollIntoView({
                            block: 'center',
                            inline: 'center',
                            behavior: 'smooth'
                        })
                    }
                }
            }

        </script>
    @endonce
@endpush
