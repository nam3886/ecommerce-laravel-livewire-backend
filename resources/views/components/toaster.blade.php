<div {{ $attributes }} x-data="toaster()" x-init="init" @flash-messages.window="display"></div>

@push('scripts')
    @once
        <script>
            function toaster() {
                return {
                    message: '{{ session('message') }}',
                    error: '{{ session('error') }}',
                    toast: {
                        success: (msg) => toastr.success(msg),
                        error: (msg) => toastr.error(msg),
                        warning: (msg) => toastr.warning(msg),
                        info: (msg) => toastr.info(msg),
                    },
                    display: function($event) {
                        const {
                            type,
                            message
                        } = $event.detail;

                        if (type && message) this.toast[type](message);
                    },
                    init: function() {
                        toastr.options = {
                            closeButton: true,
                            debug: false,
                            newestOnTop: true,
                            progressBar: false,
                            positionClass: 'toast-top-right',
                            preventDuplicates: true,
                            onclick: null,
                            showDuration: 300,
                            hideDuration: 1000,
                            timeOut: 5000,
                            extendedTimeOut: 1000,
                            showEasing: 'swing',
                            hideEasing: 'linear',
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut',
                        }

                        if (this.message) this.display({
                            detail: {
                                type: 'success',
                                message: this.message
                            }
                        });

                        if (this.error) this.display({
                            detail: {
                                type: 'error',
                                message: this.error
                            }
                        });
                    },
                }
            }

        </script>
    @endonce
@endpush
