document.getElementById("reviewForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const rating = document.getElementById("rating").value;
  const testimonial = document.getElementById("testimonial").value;

  const reviewsContainer = document.getElementById("reviews");
  const reviewDiv = document.createElement("div");
  reviewDiv.className = "review";
  reviewDiv.innerHTML = `<strong>${name}</strong> - ${rating}<br>${testimonial}`;

  reviewsContainer.prepend(reviewDiv);

  this.reset();
});
