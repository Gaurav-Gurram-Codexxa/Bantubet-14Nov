function changeLocale(locale) {
    $.post('change-locale', {
        locale: locale,
        _token: csrf_token
    }, (data) => {
        location.reload();
    });
}
// live timer
function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59


    if (h == 0) {
        h = 24;
    }

    if (h > 24) {
        h = h - 24;

    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " ";
    document.getElementById("clockContainer").innerText = time;
    document.getElementById("clockContainer").textContent = time;

    setTimeout(showTime, 1000);

}

showTime();

$(document).ready(function () {
		
    // $(".left-nav-panel>ul>li>ul>li").click(function (){

    //   $(this).addClass("active").siblings().removeClass("active");

    //     // var row = $(this).closest("#parent_menu");
    //     // row.siblings().removeClass("active");
    //     // row.addClass("active");
    // });

    // $(".left-nav-panel>ul>li>ul>li").click(function (){
    //     $("#parent_menu").addClass("active");
    // });

    // setting modal

    var modal = document.getElementById("setting_dailog");

    $("#openModal").click(function () {

        modal.showModal();
        // alert("open");
    });
    $("#dailog_btn").click(function () {
        $("#limit").close();
        // alert("close");
    });
    $("#cross").click(function () {
        modal.close();
        // alert("close");
    });




    //    date range picker
    $(function () {
        $('input[name="daterange"]').daterangepicker({
            locale:
            {
                format: 'DD/MM/YYYY'
            },
            ranges:
            {
                'Today': [moment(), moment().add(1, 'days')],
                'Yesterday': [moment().subtract(1, 'days'), moment()],
                'Last 7 Days': [moment().subtract(6, 'days'), moment().add(1, 'days')],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function (start, end, label) {
            $('[name=start_date]').val(start.format('YYYY-MM-DD'));
            $('[name=end_date]').val(end.format('YYYY-MM-DD'));
        });
    });
});
// select

//  

function populate(frm, data) {
    $.each(data, function (key, value) {
        var ctrl = $('[name=' + key + ']', frm);
        switch (ctrl.prop("type")) {
            case "radio":
            case "checkbox":
                ctrl.each(function () {
                    if ($(this).attr('value') == value) $(this).attr("checked", value);
                });
                break;
            default:
                ctrl.val(value);
        }
    });
}

function toastAlert(msg) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.success(msg);
}


// sportsbook filter accordian
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
    accordionItemHeader.addEventListener("click", event => {

        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;

        if (accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = 0;

        }
        else {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        }

    });
});

let table = null;
$(document).ready(function () {
    App.init();
	
    if (typeof url !== 'undefined') {
        table = $('#example').DataTable({
            serverSide: true,
            ajax: url,
            dom: '<"dt-buttons"Bf><"clear">lftipr',
            paging: true,
            pageLength: 20,
            autoWidth: true,
            "bPaginate": true, //hide pagination
            "bFilter": false, //hide Search bar
            "bInfo": false,
            buttons:  [
				'colvis',
				'copyHtml5',
				'csvHtml5',
				'excelHtml5',
				'pdfHtml5',
				'print'
    				]
        });
        table.on('preDraw.dt', () => {
            $('.bc-separate-loader-container').show();
        })

        table.on('draw.dt', () => {
            $('.bc-separate-loader-container').hide();
        })
    }

    $('#settingForm').on('submit', (e) => {
        var modal = document.getElementById('setting_dailog');
        e.preventDefault();
        const data = new FormData(e.target)
        const formJSON = Object.fromEntries(data.entries());
        formJSON['_token'] = csrf_token
        $.post('update-setting', formJSON, (res, status) => {
            modal.close()
            location.reload();
        });
    });

    $('#changePassword').click(e => {
        e.preventDefault();
        document.getElementById('changePasswordModal').showModal();
    });


    $('#passwordForm').on('submit', (e) => {
        var modal = document.getElementById('changePasswordModal');
        e.preventDefault();
        const data = new FormData(e.target)
        const formJSON = Object.fromEntries(data.entries());
        formJSON['_token'] = csrf_token
        $.post('update-password', formJSON, (res, status) => {
            let type = 'success';
            if (res.status) {
                modal.close();
            } else {
                type = 'error';
            }

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[type](res.message);
        });
    });

    $('.cross').click(e => {
        var modal = document.getElementById('setting_dailog');
        var passwordModal = document.getElementById('changePasswordModal');
        modal.close()
        passwordModal.close()
    });

});

