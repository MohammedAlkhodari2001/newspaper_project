<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <!-- Contact Us Section -->
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Contact Us For Any Queries</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <h6 class="text-uppercase font-weight-bold">Contact Info</h6>
                        <p class="mb-4">
                            The contact form is currently inactive. You can reach us at the office for more information.
                        </p>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Our Office</h6>
                            </div>
                            <p class="m-0">123 Street, New York, USA</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-envelope-open text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Email Us</h6>
                            </div>
                            <p class="m-0">info@example.com</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-phone-alt text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Call Us</h6>
                            </div>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>

                    <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="nameInput" class="form-control p-4" placeholder="Your Name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="emailInputContact" class="form-control p-4" placeholder="Your Email" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="subjectInput" class="form-control p-4" placeholder="Subject" required />
                        </div>
                        <div class="form-group">
                            <textarea id="messageInput" class="form-control" rows="4" placeholder="Message" required></textarea>
                        </div>
                        <div>
                            <button id="sendButton" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="button">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="col-lg-4">
                <!-- Follow Us -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="#" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                            <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Fans</span>
                        </a>
                        <a href="#" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                            <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="#" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                            <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Connects</span>
                        </a>
                        <a href="#" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                            <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="#" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                            <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Subscribers</span>
                        </a>
                        <a href="#" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                            <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                    </div>
                </div>

                <!-- Subscribe Section -->
                <livewire:subscribe-component />

            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Form Validations -->
<script>
    // Contact Form Validation
    document.getElementById('sendButton').addEventListener('click', function () {
        const name = document.getElementById('nameInput').value.trim();
        const email = document.getElementById('emailInputContact').value.trim();
        const subject = document.getElementById('subjectInput').value.trim();
        const message = document.getElementById('messageInput').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!name || !email || !subject || !message) {
            alert('Please fill in all fields!');
            return;
        }

        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address!');
            return;
        }

        alert('Thank you for your feedback!');
        document.getElementById('contactForm').reset();
    });

    // Subscribe Form Validation
    document.getElementById('subscribeBtn').addEventListener('click', function () {
        const email = document.getElementById('subscribeEmailInput').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            alert("Please enter your email address!");
            return;
        }

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address!");
            return;
        }

        alert("Thank you for your subscription!");
        document.getElementById('subscribeEmailInput').value = "";
    });
</script>
