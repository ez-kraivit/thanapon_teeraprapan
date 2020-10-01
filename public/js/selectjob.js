$(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    $("#selectjobs").change(function () {
        const conceptName = jQuery(
            '#selectjobs :selected').val();
        // console.log(conceptName);
        if (conceptName == 'ทันตแพทย์') {
            document.getElementById(
                    'DentalLicenseNumber').style
                .display = '';
        } else if (conceptName == 'อาจารย์') {
            document.getElementById(
                    'DentalLicenseNumber').style
                .display = '';
        } else if (conceptName ==
            'นักศึกษาทันตแพทย์') {
            document.getElementById(
                    'DentalLicenseNumber').style
                .display = 'none';
        } else if (conceptName == 'ช่างทันตกรรม') {
            document.getElementById(
                    'DentalLicenseNumber').style
                .display = 'none';
        } else if (conceptName ==
            'นักศึกษาและนักเรียน') {
            document.getElementById(
                    'DentalLicenseNumber').style
                .display = 'none';
        } else if (conceptName == 'อื่น ๆ')
            document.getElementById(
                'DentalLicenseNumber').style
            .display = 'none';
    });
});
