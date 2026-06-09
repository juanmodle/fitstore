window.FITSTORE = window.FITSTORE || {};

window.FITSTORE.csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute('content');
