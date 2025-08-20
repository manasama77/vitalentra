<div id="contact" class="bg-base-100 py-8 md:py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="scroll-revealed relative mx-auto mb-12 w-fit sm:mb-16 lg:mb-24">
            <h2 class="text-base-content text-2xl font-bold md:text-3xl lg:text-4xl">
                {{ __('contact.title') }}
            </h2>
        </div>

        <div class="scroll-revealed grid items-center gap-12 lg:grid-cols-2">
            <!-- Image Section -->
            <object data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3795.5880251306326!2d106.78234479999999!3d-6.2634414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a8a034678d%3A0x3e4a041162a0c7d9!2sPondok%20Indah%20Mall%20Phase%203%2C%20Office%20Tower%205%2C%20RT.1%2FRW.16%2C%20Pondok%20Pinang%2C%20Kebayoran%20Lama%2C%20South%20Jakarta%20City%2C%20Jakarta%2012310!5e1!3m2!1sen!2sid!4v1754729817199!5m2!1sen!2sid"
                    class="h-100 order-2 w-full border-0 md:order-1 md:h-full"></object>

            <!-- Contact Info Section -->
            <div class="order-1 md:order-2">
                <!-- Contact Info Grid -->
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Our Address -->
                    <div class="card bg-success glass shadow md:col-span-2">
                        <div class="card-body items-center gap-3">
                            <div class="avatar avatar-placeholder">
                                <div class="w-9 rounded-full border border-white text-white">
                                    <i class="fas fa-map-marker-alt text-xl text-white"></i>
                                </div>
                            </div>
                            <h4 class="text-success-content text-lg font-medium">
                                {{ __('contact.address_title') }}
                            </h4>
                            <address class="text-success-content text-center not-italic">
                                Pondok Indah Office Tower 5, Lantai 8 - Unit 1202<br />Jl. Sultan Iskandar Muda Kav.
                                V-TA, Pondok Indah<br />Jakarta 12310 &mdash; Indonesia
                            </address>
                        </div>
                    </div>

                    <div class="card bg-success glass shadow-none">
                        <div class="card-body group items-center gap-3">
                            <div class="avatar avatar-placeholder">
                                <div class="w-9 rounded-full border border-white text-white">
                                    <i class="fas fa-phone text-xl text-white"></i>
                                </div>
                            </div>
                            <h4 class="text-lg font-medium text-white">
                                {{ __('contact.phone_title') }}
                            </h4>
                            <div class="text-center">
                                <a href="https://wa.me/6281234677747" class="text-white">
                                    <i class="fab fa-whatsapp fa-fw"></i> +62 812-3467-7747
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-success glass shadow-none">
                        <div class="card-body items-center gap-3">
                            <div class="avatar avatar-placeholder">
                                <div class="w-9 rounded-full border border-white text-white">
                                    <i class="fas fa-envelope text-xl text-white"></i>
                                </div>
                            </div>
                            <h4 class="text-lg font-medium text-white">Email</h4>
                            <div class="text-center text-white">
                                <a href="mailto:info@vitalentra.com"
                                   class="!text-white hover:text-white hover:underline">info@vitalentra.com</a>
                                <a href="mailto:marketing@vitalentra.com"
                                   class="!text-white hover:text-white hover:underline">marketing@vitalentra.com</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
