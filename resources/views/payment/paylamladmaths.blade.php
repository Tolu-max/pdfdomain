<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.pdfsdomain.com.ng/css/style.css">
</head>
<body>
<style>
    body {
        background: linear-gradient(to right, #FFD700, gray); /* Medium yellow to dark yellow */
         }
         </style>
<div class="container mx-auto">
    <div class="text-white text-2xl uppercase font-semibold pt-5 pb-5">Pay For Lamlad Maths</div>
    <div class="text-white text-sm uppercase font-semibold pb-3">Please fill the below form to be able to pay for lamlad maths</div>
    <div class="bg-white border rounded shadow-lg p-6 mb-10">
        <section class="mb-4">
            <div class="text-sm text-gray-600 uppercase font-semibold pb-2">Personal Information</div>
            <form id="paymentForm" class="form--name">
                <div class="mb-4">
                    <label for="first-name" class="block text-gray-700">First Name</label>
                    <input placeholder="e.g. Richard" type="text" id="first-name" class="w-full border px-3 py-2 rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="last-name" class="block text-gray-700">Last Name</label>
                    <input placeholder="e.g. Bovell" type="text" id="last-name" class="w-full border px-3 py-2 rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email-address" placeholder="e.g. rb@apple.com" id="email" class="w-full border px-3 py-2 rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                <input type="hidden" id="amount" value="760"> <!-- Fixed amount in Naira -->
            </form>
        </section>
        <div class="text-center">
            <button type="button" id="payNowButton" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none">Pay</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('payNowButton').addEventListener('click', function () {
        const firstName = document.getElementById('first-name').value;
        const lastName = document.getElementById('last-name').value;
        const email = document.getElementById('email-address').value;
        const amountInKobo = 760 * 100; // Convert Naira to Kobo

        if (!firstName || !lastName || !email) {
            alert('All fields are required.');
            return;
        }

        const reference = '' + Math.floor(Math.random() * 1000000000 + 1);

        let handler = PaystackPop.setup({
            key: 'pk_test_a22fe2eb43bae5a12fb08bc2019a95dadb607c3a', // Replace with your Paystack public key
            email: email,
            amount: amountInKobo,
            ref: reference,
            callback: function (response) {
      alert('Payment complete! Reference: ' + response.reference);

      // Build the URL with the desired base path
      //it should have pdfdomain for local and none for hosted
      const basePath = '/pdfdomain/public/';

      const downloadUrl = basePath + 'download-lamladmaths'; // Adjust the URL as needed

      // Redirect the user to the download URL
      window.location.href = downloadUrl;
    },

            onClose: function () {
                alert('Transaction was not completed, window closed.');
            },
        });

        handler.openIframe(); // Open the Paystack payment iframe
    });
</script>


<script src="https://js.paystack.co/v1/inline.js"></script>


</body>
</html>
