function cerrarOffcanvas(offcanvasId, modalId) {
    const offcanvasEl = document.getElementById(offcanvasId);
    const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);

    if (offcanvas) {
        offcanvas.hide();
    }

    offcanvasEl.addEventListener('hidden.bs.offcanvas', () => {
        const modalEl = document.getElementById(modalId);
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }, { once: true });
}
