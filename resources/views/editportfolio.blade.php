@include('include.header')

<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form">
            <span class="contact100-form-title">
					Contact Us
				</span>


            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                <span class="label-input100">Name *</span>
                <input class="input100" type="text" name="email" placeholder="Enter Your Name ">
            </div>

            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Address">
                <span class="label-input100">Address</span>
                <input class="input100" type="text" name="phone" placeholder="Enter Address">
            </div>
            <div class="wrap-input100 bg1 rs1-wrap-input100">
                <span class="label-input100 ">Experience</span>
                <div class="form-group">
                    <input type="radio" name="gender" value="male"> Entrant<br>
                    <input type="radio" name="gender" value="female"> Skilled<br>
                    <input type="radio" name="gender" value="other"> Professional
                </div>
            </div>
            <div class="wrap-input100 bg1 rs1-wrap-input100">
                <span class="label-input100">Preferred Type</span>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="checkbox" name="vehicle1" value="Bike">Wedding<br>
                        <input type="checkbox" name="vehicle2" value="Car">Portrait<br>
                        <input type="checkbox" name="vehicle3" value="Boat">Product<br>
                        <input type="checkbox" name="vehicle3" value="Boat">Wildlife<br>
                        <input type="checkbox" name="vehicle3" value="Boat">Fineart<br>
                    </div>
                    <div class="col-sm-6">
                        <input type="checkbox" name="vehicle1" value="Bike">Architectural<br>
                        <input type="checkbox" name="vehicle2" value="Car">Travel<br>
                        <input type="checkbox" name="vehicle3" value="Boat">Advertisement<br>
                        <input type="checkbox" name="vehicle3" value="Boat">Sports<br>
                        <input type="checkbox" name="vehicle3" value="Boat">Event<br>
                    </div>
                </div>
            </div>
            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Bio">
                <span class="label-input100">Bio</span>
                <textarea class="input100" name="message" placeholder="Write your bio"></textarea>
            </div>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                </button>
            </div>
        </form>
    </div>
</div>
