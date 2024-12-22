<!-- Popup Advertisement -->
<!-- Popup Advertisement -->
<div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
  <div class="bg-white p-8 rounded-lg shadow-lg w-4/5 sm:w-1/2 max-w-md text-center relative">
    <a href="https://2ez4jiii.github.io/cek-khodam/" id="popupLink" target="_blank" rel="noopener noreferrer">
      <img
        src="img/cekkodam.png"
        alt="Special Offer"
        class="w-full rounded-md"
      />
    </a>

    <h2 class="text-2xl font-bold text-gray-800 mt-4">CEK KHODAM GRATIS</h2>
    <p class="text-gray-600 mt-2">
      Ayo cek khodam mu sekarang juga, gratis tanpa dipungut biaya!!!
    </p>

    <!-- Close Button -->
    <button
      id="closeBtn"
      class="mt-6 bg-red-600 text-white px-6 py-2 rounded-lg text-lg font-bold opacity-50 cursor-not-allowed"
      disabled
    >
      Close this AD
    </button>
  </div>
</div>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup");
    const closeBtn = document.getElementById("closeBtn");

    popup.classList.remove("hidden");

    setTimeout(() => {
        closeBtn.disabled = false;
        closeBtn.classList.remove("opacity-50", "cursor-not-allowed");
        closeBtn.classList.add("hover:text-red-500");
    }, 5000);

    closeBtn.addEventListener("click", () => {
        popup.classList.add("hidden");
    });
    });

</script>  