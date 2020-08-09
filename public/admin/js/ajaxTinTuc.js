$(document).ready(function () {

    $("#js-theloai_id").change(function () {
        let idTheLoai = ($(this).val());
        let _token = $('#addingNewsForm').find('input[name="_token"]').val();
        let loaitin_id = $("#js-loaitin_id");

        $.ajax({
            url: `get-loai-tin/${idTheLoai}`,
            type: 'POST',
            cache: false,
            data: {
                "_token": _token,
                "id": idTheLoai,
            },
            success: function (data) {
                let return_data = JSON.parse(data);
                loaitin_id.empty();
                let optionEle = `<option value="" selected>Chọn Loại Loại Tin</option>`;
                loaitin_id.append(optionEle);
                return_data.forEach(obj => {
                    let optionEle = `<option value ="${obj['id']}">${obj['Ten']}</option>`;
                    loaitin_id.append(optionEle);
                })

            }
        })
    })
});
