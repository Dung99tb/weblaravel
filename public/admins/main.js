function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    
    Swal.fire({
        title: 'Bạn có muốn xóa?',
        text: "Tất cả dữ liệu sẽ bị xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.isConfirmed) {
            if(result.value) {
                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (data) {
                        if(data.code == 200) {
                            that.parent().parent().remove();
                        }
                        Swal.fire(
                            'Thành công',
                            'Dữ liệu của bạn đã bị xóa.',
                            'success'
                            )
                    },
                    error: function () {

                    }
                });
            }
        
        }
      })
}
$(function () {
    $(document).on('click', '.action_delete', actionDelete);
})