/**
 * This function gets content that we write in wordpress
 *  (by getting content in a hidden div - see content-page.php )
 */
const getPageContent = () => {
  const content = document.getElementById('page-content')
  return content ? content.innerHTML : 'No content found'
}

export {
  getPageContent
}
