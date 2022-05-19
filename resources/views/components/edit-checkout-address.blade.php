@push('child-script')
    <script>
        function AddressSelect(value) {
            $('#editAdress').attr('action', `address/${value}`);
            $('#editAdress').submit();
        }
    </script>
@endpush

<div  id="editAddress" tabindex="-1" role="dialog" aria-labelledby="editAddressLabel"
     aria-hidden="true" x-show="isOpenModal()" @click.away="closeModal">
    <div  role="document">
        <div class="pb-4">
            <div>
                <div>
                    <h5 >ثبت آدرس جدید</h5>
                    <i @click="closeModal"></i>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div>
                <div class="my-4">
                    @foreach ($user->addresses as $address)
                        <div class="list-address @if($address->approved == 1) selected @endif mt-2 text-right"
                             onclick="AddressSelect({{$address->id}})">
                            <div class="">
                                <div>
                                    <p>
                                        <label>گیرنده : </label> <span>{{$user->name}}</span>
                                    </p>

                                    <p>
                                        <label>شماره موبایل : </label> <span>{{$address->phone}}</span>
                                    </p>
                                </div>

                                <div>
                                    <p>
                                        <label> کد پستی : </label> <span>{{$address->postcode}}</span>
                                    </p>
                                </div>

                                <div>
                                    <p class="w-full">
                                        <label>استان: </label>
                                        <span>{{$address->state->name}}</span>
                                        <label>شهرستان: </label>
                                        <span>{{$address->address}}</span>
                                        {{-- استان: {{$address->state->name}} شهرستان {{$address->city->name}}--}}
                                        <span>{{$address->address}} </span>
                                    </p>
                                </div>
                            </div>
                            <div>
                                <form action="{{route('address.destroy',$address->id)}}" method="POST">@method('DELETE')
                                    <button >حذف</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <form id="editAdress" action="" method="POST">@csrf @method('PATCH')</form>
            </div>
        </div>
    </div>
</div>
