<section class="contact-info-section">
    <h2 class="section-title"><i class="fas fa-address-book"></i> Contact Details</h2>
    
    <div class="contact-grid">
        <!-- WhatsApp -->
        <div class="contact-item">
            <i class="fab fa-whatsapp contact-icon"></i>
            <div class="contact-details">
                <h3>WhatsApp</h3>
                <a href="https://wa.me/{{$settings->phone}}" class="contact-link">{{$settings->phone ?? 'N/A'}}</a>
            </div>
        </div>

        <!-- Email -->
        <div class="contact-item">
            <i class="fas fa-envelope contact-icon"></i>
            <div class="contact-details">
                <h3>Email</h3>
                <a href="mailto:{{$settings->email}}" class="contact-link">{{$settings->email ?? 'N/A'}}</a>
            </div>
        </div>

        <!-- Facebook -->
        <div class="contact-item">
            <i class="fab fa-facebook-f contact-icon"></i>
            <div class="contact-details">
                <h3>Facebook</h3>
                <a href="{{$settings->facebook}}" class="contact-link">{{$settings->facebook ?? 'N/A'}}</a>
            </div>
        </div>

        <!-- Twitter -->
        <div class="contact-item">
            <i class="fab fa-twitter contact-icon"></i>
            <div class="contact-details">
                <h3>Twitter</h3>
                <a href="{{$settings->twitter}}" class="contact-link">{{$settings->twitter ?? 'N/A'}}</a>
            </div>
        </div>

        <!-- Instagram -->
        <div class="contact-item">
            <i class="fab fa-instagram contact-icon"></i>
            <div class="contact-details">
                <h3>Instagram</h3>
                <a href="{{$settings->instagram}}" class="contact-link">{{$settings->instagram ?? 'N/A'}}</a>
            </div>
        </div>
    </div>
</section>