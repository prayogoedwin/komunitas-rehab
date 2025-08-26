function yearNow() {
  let date = new Date();
  let year = date.getFullYear();
  document.getElementById("year").innerHTML = year;
}

window.onload = yearNow();

// Script untuk menampilkan input custom amount
document.addEventListener("DOMContentLoaded", function () {
  const customAmountRadio = document.getElementById("customAmount");
  const customAmountInput = document.getElementById("customAmountInput");

  customAmountRadio.addEventListener("change", function () {
    if (this.checked) {
      customAmountInput.style.display = "block";
    } else {
      customAmountInput.style.display = "none";
    }
  });

  // Script untuk donation option selection
  const donationOptions = document.querySelectorAll(".donation-option");
  donationOptions.forEach((option) => {
    option.addEventListener("click", function () {
      donationOptions.forEach((opt) => opt.classList.remove("active"));
      this.classList.add("active");
    });
  });
});
