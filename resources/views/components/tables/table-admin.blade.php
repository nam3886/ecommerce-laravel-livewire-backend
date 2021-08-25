@props(['title', 'pagination'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                {{ $button }}

                <h4 class="card-title text-capitalize">{{ $title }}</h4>

                {{ $action }}

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover">

                        {{ $head }}

                        <tbody>

                            {{ $slot }}

                        </tbody>
                    </table>
                </div>

                <x-tables.pagination :pagination="$pagination" />

            </div>
        </div>
    </div>
</div>
