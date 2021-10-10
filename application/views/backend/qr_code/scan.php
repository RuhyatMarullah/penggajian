<div class="row">
    <div class="col-md-12">
        <div class="card box-shadow-2">
            <div class="card-header">
                <h1 style="text-align: center">Absen</h1>
            </div>
            <hr>
            <div class="card-body ">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-success alert-dismissible animated fadeInDown" role="alert" style="display: none;" id="alert_200">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Absen berhasil!
                        </div>

                        <div class="alert alert-warning alert-dismissible animated fadeInDown" role="alert" style="display: none;" id="alert_300">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Anda sudah absen!
                        </div>

                        <div class="alert alert-danger alert-dismissible animated fadeInDown" role="alert" style="display: none;" id="alert_400">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Qr-code Salah!
                        </div>
                        <div id="qr-reader"></div>
                        <div id="qr-reader-results"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete" ||
            document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function() {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                $.ajax({
                    url: `<?= base_url() ?>absen/tambah/${decodedText}`,
                    type: 'ajax',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            $("#alert_200").css("display", "block");
                        } else if (response.status == 300) {
                            $("#alert_300").css("display", "block");
                        } else if (response.status == 400) {
                            $("#alert_400").css("display", "block");
                        }

                        setTimeout(() => {
                            $(".alert").css("display", "none");
                        }, 3000);

                    },
                    error: function(response) {
                        console.log(response);
                        $("#alert_400").css("display", "block");
                        setTimeout(() => {
                            $(".alert").css("display", "none");
                        }, 3000);
                    }
                });
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>