const $triggerEl = document.getElementById('filterTargetModal');
const $modalEl = document.getElementById('filterModal');

const modal= new Modal(
    $modalEl,
    {
        onShow: (modal) => {
            const classList = Object.entries(modal._targetEl.classList);

            classList.forEach(([,c]) => {
                if (c.substring(0, 5) === 'puwnz') {
                    return c;
                }

                modal._targetEl.classList.remove(c);
                modal._targetEl.classList.add(`puwnz-${c}`);

                return c;
            });

            modal._targetEl.classList.remove('flex');
            modal._targetEl.classList.add('puwnz-flex');
            modal._targetEl.classList.remove('puwnz-hidden');

            document.body.classList.add('puwnz-overflow-hidden');
            document.body.classList.remove('overflow-hidden');
        },
        onHide: (modal) => {
            modal._targetEl.classList.add('puwnz-hidden');
            modal._targetEl.classList.remove('puwnz-flex');

            // re-apply body scroll
            document.body.classList.remove('puwnz-overflow-hidden');
        },
        backdropClasses: 'puwnz-bg-gray-900 puwnz-bg-opacity-50 puwnz-fixed puwnz-inset-0 puwnz-z-40',
    }
);

$triggerEl.addEventListener('click', () => {
    modal.toggle();
});
