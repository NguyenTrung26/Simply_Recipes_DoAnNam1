function search() {
    var searchInput = document.getElementById("searchInput").value;
  
    fetch("search.php?keyword=" + searchInput)
      .then(function(response) {
        return response.json(); // Chuyển đổi kết quả thành đối tượng JSON
      })
      .then(function(data) {
        displayResults(data);
      })
      .catch(function(error) {
        console.error(error);
      });
  }
  
  function displayResults(data) {
    var searchResults = document.getElementById("searchResults");
  
    // Xóa kết quả tìm kiếm hiện tại
    searchResults.innerHTML = "";
  
    // Hiển thị kết quả tìm kiếm
    data.forEach(function(result) {
      var resultItem = document.createElement("div");
      resultItem.textContent = result.title;
      searchResults.appendChild(resultItem);
    });
  }
  