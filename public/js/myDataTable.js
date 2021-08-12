$(document).ready(function() {
    $('#table').DataTable({
        "language": {
            oAria: { sSortAscending: ": nhấn để sắp xếp tăng dần", sSortDescending: ": nhấn để sắp xếp giảm dần" },
            oPaginate: { sFirst: "Trang Đầu", sLast: "Trang Cuối", sNext: ">", sPrevious: "<" },
            sEmptyTable: "Không có dữ liệu trong bảng",
            sInfo: "Hiển thị từ dòng _START_ đến dòng _END_ trong tổng _TOTAL_ dòng",
            sInfoEmpty: "Hiển thị từ dòng 0 đến dòng 0 trong tổng 0 dòng",
            sInfoFiltered: "(Lọc từ tổng _MAX_ dòng)",
            sInfoPostFix: "",
            sDecimal: "",
            sThousands: ",",
            sLengthMenu: "Hiển thị _MENU_ dòng",
            sLoadingRecords: "Đang tải...",
            sProcessing: "Đang xử lý...",
            sSearch: "Tìm kiếm:",
            sSearchPlaceholder: "",
            sUrl: "",
            sZeroRecords: "Không có kết quả phù hợp"
        }
    });
});