function copyLink() {
  // Get the current page URL
  var copyText = window.location.href;

  // Use the Clipboard API to copy the URL to the clipboard
  navigator.clipboard.writeText(copyText).then(
    function () {
      // Success feedback
      alert("Link copied to clipboard!");
    },
    function (err) {
      // Error feedback
      console.error("Could not copy text: ", err);
    }
  );
}
