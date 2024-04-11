/* them anh */
let addPic = document.getElementById("add_pic");
let addFile = document.getElementById("add_file");

	addFile.onchange = function(){
		addPic.src = URL.createObjectURL(addFile.files[0]);
	}

let updatePic = document.getElementById("update_pic");
let updateFile = document.getElementById("update_file");

    updateFile.onchange = function(){
        updatePic.src = URL.createObjectURL(updateFile.files[0]);
    }
/* them anh */

/* function validate customer form */
function formValidate(ten, email, dienthoai) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên!</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự!</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại!</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại</span>";
        return alert;
    }
    
    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email!</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ!</span>";
        return alert;
    }
    
    return alert;
}
/* function validate customer form */

/* function validate user form */
function formValidateUser(ten, email, dienthoai, phanquyen) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên!</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự!</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại!</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại</span>";
        return alert;
    }
    
    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email!</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ!</span>";
        return alert;
    }
    console.log(phanquyen);
    
    //Phan quyen
    if(phanquyen==-1){ // phanquyen===-1 sai, phanquyen==="-1" dung
        console.log("hello");
        alert = "<span class='red'>Vui lòng phân quyền cho người dùng!</span>";
        return alert;
    }
    return alert;
}
/* function validate user form */

/* function validate discount form */
function formValidateDiscount(phantram, ngaybatdau, ngayketthuc) {
    //Kiểm tra hợp lệ
    let alert = '';

    //phantram
    if(phantram <= 0 ) {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập phần trăm lớn hơn 0!</span>";
        return alert;
    }

    //thoi gian
    if(ngaybatdau >= ngayketthuc){
        alert = "<span class='red'>Thời gian không hợp lệ!</span>";
        return alert;
    }
    
    return alert;
}
/* function validate discount form */

/* function validate product form */
function formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, giaban, idTL, mota) {
    // Kiểm tra hợp lệ
    let alert = '';

    // tuasach
    if(tuasach == "") {   
        alert = "<span class='red'>Vui lòng nhập tựa sách.</span>";
        return alert;
    }

    // nxb
    if(nxb == ""){
        alert = "<span class='red'>Vui lòng nhập nhà xuất bản.</span>";
        return alert;
    }

    // idNCC
    if(idNCC == -1){
        alert = "<span class='red'>Vui lòng chọn nhà cung cấp.</span>";
        return alert;
    }

    // giabia
    if(isNaN(giabia) || giabia <= 0){
        alert = "<span class='red'>Giá bìa không hợp lệ.</span>";
        return alert;
    }
    
    // tacgia
    if(tacgia == ""){
        alert = "<span class='red'>Vui lòng nhập tác giả.</span>";
        return alert;
    }

    // namxb
    if(isNaN(namxb) || namxb <=0 ){
        alert = "<span class='red'>Vui lòng nhập tác giả.</span>";
        return alert;
    }

    // giaban
    if(isNaN(giaban) || giaban <= 0){
        alert = "<span class='red'>Giá bán không hợp lệ.</span>";
        return alert;
    }

    // idTL
    if(idTL == -1){
        alert = "<span class='red'>Vui lòng chọn thể loại.</span>";
        return alert;
    }

    // mota
    if(mota == ""){
        alert = "<span class='red'>Vui lòng nhập mô tả.</span>";
        return alert;
    }

    return alert;
}
/* function validate product form */