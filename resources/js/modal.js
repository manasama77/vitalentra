// Simple Modal System
function openModal(modalId) {
	const modal = document.getElementById('modal-' + modalId);
	if (modal) {
		modal.style.display = 'flex';
		document.body.style.overflow = 'hidden';
	}
}

function closeModal(modalId) {
	const modal = document.getElementById('modal-' + modalId);
	if (modal) {
		modal.style.display = 'none';
		document.body.style.overflow = '';
	}
}

// Close modal when clicking backdrop
document.addEventListener('click', function (e) {
	if (
		e.target.classList.contains('bg-black') &&
		e.target.classList.contains('bg-opacity-80')
	) {
		const modal = e.target;
		modal.style.display = 'none';
		document.body.style.overflow = '';
	}
});

// Close modal on ESC key
document.addEventListener('keydown', function (e) {
	if (e.key === 'Escape') {
		const modals = document.querySelectorAll('[id^="modal-"]');
		modals.forEach(modal => {
			if (modal.style.display === 'flex') {
				modal.style.display = 'none';
				document.body.style.overflow = '';
			}
		});
	}
});

// Make functions globally available for inline onclick handlers
window.openModal = openModal;
window.closeModal = closeModal;
