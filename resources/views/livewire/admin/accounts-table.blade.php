<div class="col">

    <div class="form-group">
        <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('Search accounts...')"/>
    </div>

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">

            <div class="list-group list-group-flush">
                @foreach ($accounts as $account)
                <a href="{{ route("account.show", ["user" => $account]) }}" class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img class="img-fluid rounded-circle bg-white p-1" style="width: 4rem;" src="https://robohash.org/{{ $account->email }}?gravatar=yes&amp;set=set4&amp;size=128x128" alt="">
                        </div>
                        <div class="col-md-10">
                            <div class="m-1">
                                <h6 class="font-weight-bold text-center text-md-left text-primary">{{ $account->name }}</h6>
                                <p class="m-0">
                                    <i class="fas fa-at text-info"></i>
                                    {{ $account->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="p-5">
                {{ $accounts->links() }}
            </div>

        </div>
    </div>
</div>