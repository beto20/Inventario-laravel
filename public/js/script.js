const itemSelect = document.getElementById('itemSelect');
const categorySelect = document.getElementById('categorySelect');

const options = {
    frutas: [
        { value: 'manzana', text: 'Manzana' },
        { value: 'platano', text: 'Plátano' },
        { value: 'naranja', text: 'Naranja' }
    ],
    verduras: [
        { value: 'zanahoria', text: 'Zanahoria' },
        { value: 'brocoli', text: 'Brócoli' },
        { value: 'espinaca', text: 'Espinaca' }
    ]
};

function updateOptions() {
    const selectedCategory = categorySelect.value;

    // Clear previous options
    itemSelect.innerHTML = '<option value="">Seleccione un item</option>';

    if (selectedCategory) {
        // Enable the itemSelect
        itemSelect.disabled = false;

        // Add new options
        options[selectedCategory].forEach(option => {
            const newOption = document.createElement('option');
            newOption.value = option.value;
            newOption.text = option.text;
            itemSelect.add(newOption);
        });
    } else {
        // Disable the itemSelect if no category is selected
        itemSelect.disabled = true;
    }
}