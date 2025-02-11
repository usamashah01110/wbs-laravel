<div id="toastContainer" class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"></div>
<script>
    console.log("click")

    function showToast(message, type = "success") {
        const toast =
            `<div class="p-3 text-white bg-${type === "success" ? "green" : "red"}-500 rounded-md">${message}</div>`;
        $("#toastContainer").html(toast);
        setTimeout(() => $("#toastContainer").html(""), 3000);
    }
</script>
