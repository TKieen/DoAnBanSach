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
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }

    return alert;
}
/* function validate customer form */

/* function validate customer form */
function formValidate_add(ten, email, dienthoai, matkhau) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //mat khau
    if(matkhau==""){
        alert = "<span class='red'>Vui lòng nhập mật khẩu.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
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
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }    
    console.log(phanquyen);
    
    //Phan quyen
    if(phanquyen==-1){ // phanquyen===-1 sai, phanquyen==="-1" dung
        alert = "<span class='red'>Vui lòng phân quyền cho người dùng.</span>";
        return alert;
    }
    return alert;
}
/* function validate user form */

function formValidateUser_edit(email, phanquyen) {
    //Kiểm tra hợp lệ
    let alert = '';
    
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }
    
    //Phan quyen
    if(phanquyen==-1){ // phanquyen===-1 sai, phanquyen==="-1" dung
        alert = "<span class='red'>Vui lòng phân quyền cho người dùng.</span>";
        return alert;
    }
    return alert;
}

/* function validate user form */
function formValidateUser_add(ten, email, dienthoai, matkhau, phanquyen) {
    //Kiểm tra hợp lệ
    let alert = '';
    let tenRegex = /^[\p{L} ]+$/u;
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;
    let matkhauRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }
    if (!tenRegex.test(ten)) {
        alert = "<span class='red'>Tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //mat khau
    if(matkhau==""){
        alert = "<span class='red'>Vui lòng nhập mật khẩu.</span>";
        return alert;
    } else if (!matkhauRegex.test(matkhau)){
        alert = "<span class='red'>Mật khẩu chưa đủ mạnh</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }    
    console.log(phanquyen);

    //Phan quyen
    if(phanquyen==-1){ // phanquyen===-1 sai, phanquyen==="-1" dung
        alert = "<span class='red'>Vui lòng phân quyền cho người dùng.</span>";
        return alert;
    }
    return alert;
}
/* function validate user form */

/* function validate supplier form */
function formValidateSupplier(ten, email, dienthoai, tinhdiachi, huyendiachi, xaphuongdiachi, diachi) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;
    let tenRegex = /^[a-zA-Z ]{3,16}$/;
    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    if(!tenRegex.test(ten)){
        alert = "<span class='red'>Họ tên chỉ gồm ký tự chữ.</span>";
        return alert;
    }
    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }

    if(tinhdiachi === ''){
        alert = "<span class='red'>Vui lòng chọn Tỉnh/Thành phố.</span>";
        return alert;
    }

    if(huyendiachi === ''){
        alert = "<span class='red'>Vui lòng chọn Quận/Huyện.</span>";
        return alert;
    }

    if(xaphuongdiachi === ''){
        alert = "<span class='red'>Vui lòng chọn Phường/Xã.</span>";
        return alert;
    }

    //diachi
    if(diachi === ''){
        alert = "<span class='red'>Vui lòng nhập địa chỉ.</span>";
        return alert;
    }
    
    return alert;
}
/* function validate supplier form */
function formValidateSupplier_edit(diachi) {
    //Kiểm tra hợp lệ
    let alert = '';
    //diachi
    if(diachi === ''){
        alert = "<span class='red'>Vui lòng nhập địa chỉ.</span>";
        return alert;
    }
    
    return alert;
}

/* function validate discount form */
function formValidateDiscount(phantram, ngaybatdau, ngayketthuc) {
    //Kiểm tra hợp lệ
    let alert = '';
    var curr_date = new Date();
    //phantram
    if(phantram == ""){
        alert = "<span class='red'>Phần trăm không được để trống</span>";
        return alert;
    }

    if(phantram < 0 || isNaN(phantram)) {   //nếu tên rỗng
        alert = "<span class='red'>Phần trăm phải là số lớn hơn 0 </span>";
        return alert;
    }

    if(phantram > 100){
        alert = "<span class='red'>Phần trăm phải là số bé hơn 100 </span>";
        return alert;
        
    }
    //thoi gian
    var start = new Date(ngaybatdau);
    start.setHours(0, 0, 0, 0);
    curr_date.setHours(0,0,0,0);    

    if(ngaybatdau == ""){
        alert = "<span class='red'>Ngày bắt đầu không được để trống!</span>";
        return alert;
    }

    if(ngayketthuc == ""){
        alert = "<span class='red'>Ngày kết thúc không được để trống!</span>";
        return alert;
    }

    if(start <= curr_date){
        alert = "<span class='red'>Ngày bắt đầu phải lớn hơn ngày hiện tại!</span>";
        return alert;
    }

    if(ngaybatdau >= ngayketthuc){
        alert = "<span class='red'>Ngày kết thúc phải lớn hơn ngày bắt đầu!</span>";
        return alert;
    }

    return alert;
}
/* function validate discount form */

/* function validate product form */
function formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, idTL, mota) {
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
    if (giabia == "") {
        alert = "<span class='red'>Giá bìa không được để trống.</span>";
        return alert
    }

    if (giabia <= 0) {
        alert = "<span class='red'>Giá bìa phải lớn hơn 0.</span>"
    }

    if(isNaN(giabia)){
        alert = "<span class='red'>Giá bìa không hợp lệ.</span>";
        return alert;
    }
    
    // tacgia
    if(tacgia == ""){
        alert = "<span class='red'>Vui lòng nhập tác giả.</span>";
        return alert;
    }

    // namxb
    var curr_date = new Date();
    if (namxb == "") {
        alert = "<span class='red'>Năm xuất bản không được để trống.</span>";
        return alert
    }
    if(isNaN(namxb) || namxb <1000 || namxb>curr_date.getFullYear()){
        alert = "<span class='red'>Vui lòng nhập năm xuất bản hợp lệ.</span>";
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

function formValidateProduct_edit(mota) {
    // Kiểm tra hợp lệ
    let alert = '';

    // mota
    if(mota == ""){
        alert = "<span class='red'>Vui lòng nhập mô tả.</span>";
        return alert;
    }

    return alert;
}

/* function validate inventory form */
function formValidateInventory(sanpham, soluong) {
   // Kiểm tra hợp lệ
    if(sanpham.length == 0){
        alert("Vui lòng nhập sản phẩm.");
        return false;
    }

    for(var i = 0; i<sanpham.length; i++)
        if(sanpham[i].value == "-1"){
            alert("Vui lòng nhập sản phẩm.\nLỗi: dòng "+(i+1));
            return false;
        }

    for(var i = 0; i<soluong.length; i++)
        if(soluong[i].value == ""){
            alert("Vui lòng nhập số lượng.\nLỗi: dòng "+(i+1));
            return false;
        } else if(isNaN(soluong[i].value)){
            alert("Vui lòng nhập số lượng là số lớn hơn 0 và bé hơn 9999.\nLỗi: dòng "+(i+1));
             return false;
        }
        else if(soluong[i].value <= 0){
            alert("Vui lòng nhập số lượng lớn hơn 0.\nLỗi: dòng "+(i+1));
            return false;
        }
    
    return true;
}
/* function validate inventory form */

/* function validate inventory form 2*/
function formValidateInventory2(soluong) {
    // Kiểm tra hợp lệ 
     for(var i = 0; i<soluong.length; i++)
        if(soluong[i].value == ""){
            alert("Vui lòng nhập số lượng.\nLỗi: dòng "+(i+1));
            return false;
        } else if(isNaN(soluong[i].value)){
            alert("Vui lòng nhập số lượng là số lớn hơn 0 và bé hơn 9999.\nLỗi: dòng "+(i+1));
             return false;
        }
        else if(soluong[i].value <= 0 || soluong[i].value >9999){
             alert("Vui lòng nhập số lượng lớn hơn 0 và bé hơn 9999.\nLỗi: dòng "+(i+1));
             return false;
         }
 
     return true;
 }
 /* function validate inventory form 2*/

 function formValidateCategory(ten) {
    let alert = '';
    let tenRegex = /^[a-zA-Z0-9]{1,16}$/;
    let regexKyTuDacBiet = /^[^\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?]*$/;

    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập thể loại.</span>";
        return alert;
    }

    if(!regexKyTuDacBiet.test(ten)) {
        alert = "<span class='red'>Thể loại không hop lệ. Thể loại không chứa ký tự đặc biệt.</span>";
        return alert;
    }

    if(!tenRegex.test(ten)) {
        alert = "<span class='red'>Thể loại không hop lệ. Thể loại không quá 16 ký tự.</span>";
        return alert;
    }
    return alert;
 }

//  function checkFilterProduct(){
//     priceFrom = document.getElementById("priceFrom").value;
//     priceTo = document.getElementById("priceTo").value;
//      // TH1: nếu người dùng nhập cả 2 ô priceFrom và priceTo
//     if(priceFrom != "" && priceTo != ""){
//         if(!isNaN(priceFrom) && !isNaN(priceTo)){
//             if(priceFrom < 0 || priceTo<0){
//                 alert("Số tiền nhập vào phải lớn hơn 0!");
//                 return false;
//             }
//             else
//                 if(priceFrom> priceTo){
//                     alert("Giá tối thiểu phải nhỏ hơn giá tối đa!");
//                     return false;
//                 }
//             }else{
//                 alert("Giá trị nhập vào phải là chữ số!");
//                 return false;
//             }
//     }else{
//         // TH2: nếu người dùng chỉ nhập priceFrom
//         if(priceFrom != ""){
//             if(!isNaN(priceFrom)){
//                 if(priceFrom < 0){
//                     alert("Số tiền nhập vào phải lớn hơn 0!");
//                     return false;
//                 }
//             }else{
//                 alert("Giá trị nhập vào phải là chữ số!");
//                 return false;
//             }
//         }
//         else{
//             // TH3: nếu người dùng chỉ nhập priceTo
//             if(!isNaN(priceTo)){
//                 if(priceTo < 0){
//                     alert("Số tiền nhập vào phải lớn hơn 0!");
//                     return false;
//                 }
//             }else{
//                 alert("Giá trị nhập vào phải là chữ số!");
//                 return false;
//             }
//         }
//     }
    

//}