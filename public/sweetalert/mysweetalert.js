/* ==== sweetalert_function ===== */
//การเรียกใช้ : $msg2 ="save_success()";


    //บันทึกข้อมูล_สำเร็จ
    function save_success(){
        swal({
                title: "บันทึกข้อมูลสำเร็จ",
                text: "",
                type:"success",
                showConfirmButton: false,
                timer: 2000,
        });
    }
    //บันทึก_ล้มเหลว
    function save_error(){
        swal({
                title: "ไม่สามารถบันทึกข้อมูลได้",
                text: "",
                type:"error",
                showConfirmButton: false,
                timer: 2000,
        });
    }
    //ลบ_สำเร็จ
    function delete_success(){
        swal({
                title: "ลบข้อมูลเรียบร้อย",
                text: "",
                type:"success",
                showConfirmButton: false,
                timer: 2000,
        });
    }
    //ลบ_ล้มเหลว
    function delete_error(){
        swal({
                title: "ไม่สามารถลบข้อมูลได้",
                text: "",
                type:"error",
                showConfirmButton: false,
                timer: 2000,
        });
    }
    //แก้ไข_สำเร็จ
    function edit_success(){
        swal({
                title: "แก้ไขข้อมูลเรียบร้อยแล้ว",
                text: "",
                type:"success",
                showConfirmButton: false,
                timer: 2000,
        });
    }
    //แก้ไข_ล้มเหลว
    function edit_error(){
        swal({
                title: "ไม่สามารถแก้ไขข้อมูลได้",
                text: "",
                type:"error",
                showConfirmButton: false,
                timer: 2000,
        });
    }


//===---ฟังก์ชัน alert แบบกำหนดข้อความได้ =====---

    //ทำงานสำเร็จ  (ตัวอย่างการเรียกใช้): $msg2 ="success('ท่านยกเลิกรายการเรียบร้อยแล้ว')";
    function success(text,timer=2000){
        swal({
                title: text,
                text: "",
                type:"success",
                showConfirmButton: false,
                timer: timer,
        });
    }   
    //ล้มเหลว
     function error(text,timer=2000){
        swal({
                title: text,
                text: "",
                type:"error",
                showConfirmButton: false,
                timer: timer,
        });
    }   
    //แจ้งเตือน (ตัวอย่างการเรียกใช้): $msg2 ="sw('กรุณาเลือกเดือนให้ถูกต้อง')";
     function sw(text){
        swal({
                title: text,
                text: "",
                type:"warning",
                showConfirmButton: true,
               
        });
    }   
 /*=============== END =================*/