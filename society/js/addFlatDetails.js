$(document).ready(function () {

    $(document).on('click', '#remove_flat', function () {
        $('#addDetails').children().last().remove();
    });

    $(document).on('click', '#add_flat', function (e) {
        e.preventDefault();
        $('#addDetails').append(`\
        <section id="remove">
        <p class="text-gray-800 font-medium text-center text-lg font-bold pt-3">Add Flat</p>
        <div class="row pt-1">
        <div class="col-lg-4 col-md-4 col-sm-6 m-1">
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="username" name="name[]" type="text" placeholder="User Name">
            <span class="span" id="c_name"></span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 m-1">
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email[]" type="email" placeholder="Email">
            <span class="span" id="c_email"></span>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 m-1">
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="phoneNo" name="phoneNo[]" type="text" placeholder="Phone No">
            <span class="span" id="c_phone"></span>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-lg-4 col-md-4 col-sm-6 m-1">
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="flatNo" name="flatNo[]" type="text" placeholder="Flat No">
            <span class="span" id="c_flatNO"></span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 m-1">
            <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="password" name="password[]" type="password" required="" placeholder="*******" aria-label="password">
            <span class="span" id="c_pass"></span>
        </div>
    </div>
    </section>`);
    });

});
