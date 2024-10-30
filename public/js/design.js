
            function updateGradient() {
            const gradientType = document.getElementById('gradientType').value;
            const angle = gradientType === 'linear' ? document.getElementById('angle').value : 0;
            const colorStops = Array.from(document.querySelectorAll('.color-stop')).map(stop => {
                const color = stop.querySelector('.color-stop-picker').value;
                const position = stop.querySelector('.color-stop-position').value;
                const opacity = stop.querySelector('.color-stop-opacity').value;
                return `rgba(${hexToRgb(color)}, ${opacity / 100}) ${position}%`;
            }).join(', ');

            let gradientCSS;
            if (gradientType === 'linear') {
                gradientCSS = `linear-gradient(${angle}deg, ${colorStops})`;
            } else if (gradientType === 'radial') {
                gradientCSS = `radial-gradient(${colorStops})`;
            } else if (gradientType === 'conic') {
                gradientCSS = `conic-gradient(${colorStops})`;
            }

            document.getElementById('gradientPreview').style.background = gradientCSS;
            document.getElementById('cssOutput').value = `${gradientCSS};`;
        }

        function hexToRgb(hex) {
            const bigint = parseInt(hex.slice(1), 16);
            const r = (bigint >> 16) & 255;
            const g = (bigint >> 8) & 255;
            const b = bigint & 255;
            return `${r}, ${g}, ${b}`;
        }

        function addColorStop() {
            const container = document.getElementById('colorStopsContainer');
            const colorStopHtml = `
                <div class="color-stop">
                    <input type="color" class="color-stop-picker" value="#FFFFFF">
                    <input type="number" class="color-stop-position" value="50" min="0" max="100">
                    <input type="number" class="color-stop-opacity" value="100" min="0" max="100">
                    <span>% Opacity</span>
                    <button type="button" class="btn btn-danger btn-sm remove-stop">Remove</button>
                </div>`;
            container.insertBefore(new DOMParser().parseFromString(colorStopHtml, 'text/html').body.firstChild, container.lastElementChild);
            updateGradient();
        }

        function removeColorStop(event) {
            if (document.querySelectorAll('.color-stop').length > 2) {
                event.target.closest('.color-stop').remove();
                updateGradient();
            }
        }

        document.getElementById('colorStopsContainer').addEventListener('click', function(event) {
            if (event.target.classList.contains('add-stop')) {
                addColorStop();
            }
            if (event.target.classList.contains('remove-stop')) {
                removeColorStop(event);
            }
        });

        document.getElementById('colorStopsContainer').addEventListener('input', updateGradient);
        document.getElementById('angle').addEventListener('input', function() {
            document.getElementById('angleValue').textContent = `${this.value}°`;
            updateGradient();
        });
        document.getElementById('gradientType').addEventListener('change', updateGradient);

        // Initialize the gradient on page load
        updateGradient();
