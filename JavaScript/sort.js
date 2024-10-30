document.addEventListener('DOMContentLoaded', () => {
    const filterSelect = document.getElementById('filter');
    const sortSelect = document.getElementById('sort');
    const searchInput = document.querySelector('.search_form_input');
    const resultsContainer = document.querySelector('.search_results');
    const results = Array.from(resultsContainer.getElementsByClassName('result'));
  
    // Function to filter results
    const filterResults = () => {
      const filterValue = filterSelect.value.toLowerCase();
      const searchTerm = searchInput.value.toLowerCase();
  
      results.forEach(result => {
        const resultType = result.dataset.type ? result.dataset.type.toLowerCase() : '';
        const hasPathway = result.dataset.pathway !== undefined;
        const name = result.dataset.name ? result.dataset.name.toLowerCase() : '';
        const pathway = result.dataset.pathway ? result.dataset.pathway.toLowerCase() : '';
        const innerText = result.innerText.toLowerCase();
  
        // Check if the result matches the filter, search term, and pathway condition
        const matchesFilter =
          filterValue === 'none' || 
          resultType === filterValue || 
          (filterValue === 'pathway' && hasPathway);
          
        const matchesSearch =
          searchTerm === '' || 
          name.includes(searchTerm) || 
          pathway.includes(searchTerm) || 
          innerText.includes(searchTerm);
  
        // Show if both filter and search term match; hide otherwise
        result.style.display = (matchesFilter && matchesSearch) ? 'flex' : 'none';
      });
    };
  
    // Function to sort results
    const sortResults = () => {
      const sortValue = sortSelect.value;
      const sortedResults = [...results].sort((a, b) => {
        const dateA = new Date(a.dataset.date) || new Date(0);
        const dateB = new Date(b.dataset.date) || new Date(0);
        const nameA = a.dataset.name || '';
        const nameB = b.dataset.name || '';
  
        switch (sortValue) {
          case 'date_n2o':
            return dateB - dateA;
          case 'date_o2n':
            return dateA - dateB;
          case 'alpha_a2z':
            return nameA.localeCompare(nameB);
          case 'alpha_z2a':
            return nameB.localeCompare(nameA);
          default:
            return 0;
        }
      });
  
      // Re-attach sorted items to the container
      resultsContainer.innerHTML = ''; // Clear existing items
      sortedResults.forEach(result => resultsContainer.appendChild(result));
    };
  
    // Event listeners for search, filter, and sort
    filterSelect.addEventListener('change', () => {
      filterResults();
      sortResults();
    });
  
    sortSelect.addEventListener('change', sortResults);
  
    searchInput.addEventListener('input', () => {
      filterResults();
      sortResults();
    });
  
    // Initial load
    filterResults();
    sortResults();
  });
  