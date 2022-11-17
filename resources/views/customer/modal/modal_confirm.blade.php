<div class="modal fade bd-example-modal-lg" id="modalConfirm" role="dialog" aria-labelledby="modalConfirm"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('customer.confirm.cart')}}"  method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="modalConfirm">Xác nhận thông tin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container" style="width: 100%">
                            <div class="form-group">
                                <label>Tên người nhận hàng</label>
                                <input type="text" class="form-control " name="name"
                                    placeholder="Nhập tên của bạn" value="{{ old('name') ?? Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" class="form-control " name="phone"
                                    placeholder="Nhập số điện thoại của bạn"
                                    value="0{{ old('phone') ?? Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ: </label>
                                <input type="text" class="form-control" name="address"
                                    placeholder="Nhập địa chỉ của bạn"
                                    value="{{ old('address') ?? Auth::user()->address }}">
                            </div>
                            <div class="form-group">
                                <label>Thành tiền: </label>
                                <input readonly type="text" class="form-control" name="price"
                                    value="{{number_format($orders->sum('price')) . ' VNĐ'}}">
                            </div>
                            <div class="form-group">
                                <label>Thuế VAT (10%)</label>
                                <input readonly type="text" class="form-control" name="tax"
                                    value="{{ number_format($orders->sum('price')*0.1) . ' VNĐ' }}">
                            </div>
                            <div class="form-group">
                                <label>Phí vận chuyển: </label>
                                <input readonly type="text" class="form-control" name="ship"
                                    value="0">
                            </div>
                            <div class="form-group">
                                <label>Tổng tiền: </label>
                                <input readonly type="text" class="form-control" name="total_price"
                                    value="{{ number_format(($orders->sum('price'))+($orders->sum('price')*0.1)) . ' VNĐ' }}">
                            </div>
                            <div class="button_cart">
                                <button class="btn btn-primary">Lưu</button>
                                <a class="btn btn-danger" data-dismiss="modal" style="margin-left: 20px">Hủy</a>
                            </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
