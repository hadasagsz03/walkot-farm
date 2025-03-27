function showCategory(category, button) {
    // Sembunyikan semua kategori
    document.querySelectorAll('.category-section').forEach(section => {
        section.classList.add('d-none');
        section.classList.remove('active');
    });

    // Tampilkan kategori yang dipilih
    document.getElementById(category).classList.remove('d-none');
    document.getElementById(category).classList.add('active');

    // Update tampilan tombol filter
    document.querySelectorAll('.btn').forEach(btn => {
        btn.classList.remove('active', 'btn-success');
        btn.classList.add('btn-outline-success');
    });

    // Tambahkan efek active ke tombol yang diklik
    button.classList.add('active', 'btn-success');
    button.classList.remove('btn-outline-success');
}

document.addEventListener("DOMContentLoaded", function () {
    showCategory('produktif', document.querySelector('.btn-success'));

    document.querySelectorAll('.card-img-top').forEach(image => {
        image.addEventListener('click', function () {
            const tanamanId = this.getAttribute('data-id');
            if (tanamanId) {
                window.location.href = `/tanaman/${tanamanId}/detail`;
            }
        });

        // Hover efek untuk tombol edit
        image.parentElement.addEventListener('mouseenter', function () {
            const editBtn = this.querySelector('.edit-btn');
            if (editBtn) {
                editBtn.classList.remove('d-none');
            }
        });

        image.parentElement.addEventListener('mouseleave', function () {
            const editBtn = this.querySelector('.edit-btn');
            if (editBtn) {
                editBtn.classList.add('d-none');
            }
        });
    });
});


