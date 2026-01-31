<div id="container" style="width:800px;height:600px;border:1px solid grey"></div>
<button id="saveBtn">Save Changes</button>
<script src="https://cdn.jsdelivr.net/npm/monaco-editor@latest/min/vs/loader.js"></script>
<script>
  require.config({ paths: { 'vs': 'https://cdn.jsdelivr.net/npm/monaco-editor@latest/min/vs' }});
  require(['vs/editor/editor.main'], function() {
    // Existing file content
    const initialCode = `function hello() {\n  alert('Hello, Monaco!');\n}`;

    // Create the editor instance and set the model content
    const editor = monaco.editor.create(document.getElementById('container'), {
      value: initialCode,
      language: 'javascript',
      theme: 'vs-light'
    });

    // Save button event to get edited content
    document.getElementById('saveBtn').addEventListener('click', () => {
      const editedContent = editor.getValue();
      // Handle saving editedContent to file or backend
      console.log('Edited content:', editedContent);
      alert('File saved! Check console.');
    });
  });
</script>
