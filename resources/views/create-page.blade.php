@include('includes/header')

<div class="container">
    <div class="row justify-content-center ">

        <div class=" card  col-md-12 text-center p-0 mt-3 mb-2">
            <h2 class="custom-heading-color">Create Your Page </h2>
        </div>
        <div class="col-md-12 text-center p-0 mt-3 mb-2">
            <div class="mt-3 mb-3">
                <form id="form" method="POST" name="create_page" class="create_page" action="create_page_user">

                    @csrf
                    <div class="col-md-8 offset-md-2">
                        <ul id="progressbar">
                            <li class="active" id="step1">
                                <strong>Step 1</strong>
                            </li>
                            <li id="step2"><strong>Step 2</strong></li>
                            <li id="step3"><strong>Step 3</strong></li>
                        </ul>
                    </div>
                    <br>
                    <fieldset>
                        <div class="form-group col-sm-12 mx-auto text-left">
                            <label for="exampleFormControlInput1" class="custom-label">Page Information</label>
                            <input type="text" class="form-control page_info" id="page_info" name="page_info"
                                placeholder="Page Name(required)">
                            <p class="page_info_error"></p>
                        </div>

                        <input type="button" name="next-step" id="page_info_btn" class="next-step" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-group col-sm-12 mx-auto text-left">
                            <label for="exampleFormControlInput1" class="custom-label">Page Category</label>
                            <div id="searchDir_nw"></div>
                            <ul id="people-list" class="friendz-list">

                            </ul>
                            <p class="page_desc_error"></p>
                        </div>

                        <input type="hidden" name="category_value" id="category_value" value="" />
                        <input type="button" id="page_desc_btn" name="next-step" class="next-step" value="Next Step" />
                        <input type="button" name="previous-step" class="previous-step" value="Back" />
                    </fieldset>
                    <fieldset>
                        <div class="form-group col-sm-12 mx-auto text-left">
                            <label for="exampleFormControlInput1" class="custom-label">Page Description</label>
                            <textarea type="text" class="form-control page_info" id="page_Description"
                                name="page_descripition" placeholder="Page Name(required)"></textarea>
                        </div>
                        <input type="button" name="previous-step" class="previous-step" value="Back" />
                        <input type="submit" class="next-step" name="submit" id="submit" value="Submit" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


@include('includes/footer')
