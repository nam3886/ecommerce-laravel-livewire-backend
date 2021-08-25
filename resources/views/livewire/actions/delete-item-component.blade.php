<a wire:loading.class='not-allowed' href="#" class="dropdown-item" x-data="alertDelete()"
    x-on:click="show('{{ $element->name }}', $wire)">
    <i class="mdi mdi-trash-can font-size-16 text-danger mr-1"></i>
    Delete
</a>

@push('scripts')
    @once
        <script>
            function alertDelete() {
                return {
                    show: (name, wire) => Swal.fire({
                        title: `Are you sure to delete ${name || ''} ?`,
                        text: `You won't be able to revert this!`,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#34c38f',
                        cancelButtonColor: '#f46a6a',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!'
                    }).then((result) => {
                        if (result.value) return wire?.delete();
                        if (result.dismiss === Swal.DismissReason.cancel)
                            return Swal.fire('Cancelled', 'Your data is safe', 'error');
                    })
                }
            }

        </script>
    @endonce
@endpush
