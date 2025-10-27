
      document.addEventListener("DOMContentLoaded", () => {
        // --- ELEMEN FORM ---
        const guestForm = document.getElementById("guestForm");
        const submissionResult = document.getElementById("submissionResult");

        // --- ELEMEN FOTO ---
        const capturePhotoBtn = document.getElementById("capturePhotoBtn");
        const photoPreview = document.getElementById("photoPreview");
        const video = document.getElementById("video");
        const canvas = document.getElementById("canvas");
        const context = canvas.getContext("2d");
        let stream = null;

        // --- FUNGSI KAMERA ---
        async function startCamera() {
          try {
            stream = await navigator.mediaDevices.getUserMedia({
              video: { facingMode: "user" },
              audio: false,
            });
            video.srcObject = stream;

            // Tampilkan video, sembunyikan gambar placeholder
            video.style.display = "block";
            photoPreview.style.display = "none";

            capturePhotoBtn.textContent = "Tangkap Gambar";
            capturePhotoBtn.onclick = captureImage;
          } catch (err) {
            console.error("Error accessing camera: ", err);
            alert(
              "Tidak dapat mengakses kamera. Pastikan Anda telah memberikan izin."
            );
            capturePhotoBtn.disabled = true;
          }
        }

        function captureImage() {
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;
          context.drawImage(video, 0, 0);
          photoPreview.src = canvas.toDataURL("image/png");

          stopCamera();

          // Sembunyikan video, tampilkan gambar hasil tangkapan
          video.style.display = "none";
          photoPreview.style.display = "block";

          capturePhotoBtn.textContent = "Ambil Ulang Foto";
          capturePhotoBtn.onclick = retakePhoto;
        }

        function stopCamera() {
          if (stream) {
            stream.getTracks().forEach((track) => track.stop());
          }
        }

        function retakePhoto() {
          photoPreview.src =
            "https://placehold.co/300x400/e0e0e0/757575?text=Foto+Belum+Diambil";
          startCamera();
        }

        // Event listener untuk tombol foto
        capturePhotoBtn.addEventListener("click", startCamera);

        // --- FUNGSI VALIDASI FORM ---
        function validateForm() {
          let isValid = true;
          const requiredFields = guestForm.querySelectorAll("[required]");

          requiredFields.forEach((field) => {
            const errorMessage = field.nextElementSibling;
            field.classList.remove("input-error");
            errorMessage.textContent = "";

            if (!field.value.trim()) {
              showError(field, errorMessage, "Field ini wajib diisi.");
              isValid = false;
            } else {
              if (field.type === "email" && field.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value)) {
                  showError(field, errorMessage, "Format email tidak valid.");
                  isValid = false;
                }
              }
            }
          });
          return isValid;
        }

        function showError(field, element, message) {
          field.classList.add("input-error");
          element.textContent = message;
        }

        // --- FUNGSI PENGIRIMAN DAN TAMPIL DATA ---
        guestForm.addEventListener("submit", function (event) {
          event.preventDefault();

          if (validateForm()) {
            const formData = new FormData(guestForm);
            const data = Object.fromEntries(formData.entries());

            const photoSrc = photoPreview.src.includes("placehold.co")
              ? null
              : photoPreview.src;
            if (photoSrc) {
              data.foto = photoSrc;
            }

            displayResult(data);

            guestForm.style.display = "none";
            submissionResult.style.display = "block";
          } else {
            window.scrollTo({ top: 0, behavior: "smooth" });
          }
        });

        function displayResult(data) {
          submissionResult.innerHTML = "";

          const title = document.createElement("h2");
          title.textContent = "✅ Data Anda Berhasil Terkirim!";
          submissionResult.appendChild(title);

          for (const key in data) {
            if (data.hasOwnProperty(key)) {
              const p = document.createElement("p");
              let label = key
                .replace(/([A-Z])/g, " $1")
                .replace(/^./, (str) => str.toUpperCase());

              if (key === "foto") {
                p.innerHTML = `<strong>Foto:</strong><br><img src="${data[key]}" alt="Foto Tamu">`;
              } else {
                p.innerHTML = `<strong>${label}:</strong> ${data[key]}`;
              }
              submissionResult.appendChild(p);
            }
          }
        }
      });