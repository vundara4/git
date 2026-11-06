<script>
    document.querySelectorAll('[data-location-target]').forEach(function (button) {
        button.addEventListener('click', function () {
            const target = document.querySelector('[name="' + button.dataset.locationTarget + '"]');
            const status = button.closest('.col-12, .form-group')?.querySelector('.location-status');

            if (!target || !navigator.geolocation) {
                if (status) status.textContent = 'Location is not available in this browser.';
                return;
            }

            button.disabled = true;
            if (status) status.textContent = 'Getting your location...';

            navigator.geolocation.getCurrentPosition(function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + latitude + ',' + longitude;

                target.value = mapsUrl;
                target.dispatchEvent(new Event('input', { bubbles: true }));
                window.open(mapsUrl, '_blank', 'noopener,noreferrer');

                if (status) status.textContent = 'Google Maps location captured.';
                button.disabled = false;
            }, function () {
                if (status) status.textContent = 'Please allow location access to capture your address.';
                button.disabled = false;
            }, { enableHighAccuracy: true, timeout: 10000, maximumAge: 300000 });
        });
    });
</script><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/components/location-capture.blade.php ENDPATH**/ ?>