import hljs from 'highlight.js/lib/common';
import javascript from 'highlight.js/lib/languages/javascript';
import php from 'highlight.js/lib/languages/php';
import yaml from 'highlight.js/lib/languages/yaml';
import html from 'highlight.js/lib/languages/xml';

hljs.registerLanguage('php', php);
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('yaml', yaml);
hljs.registerLanguage('html', html);

export function highlight(selector) {
  if (! selector) {
    hljs.highlightAll();
    return;
  }

  // document.querySelectorAll(selector + ' pre code').forEach(element => {
  //   hljs.highlightElement(element);
  // });
  document.querySelectorAll(selector + ' pre code').forEach(highlightElement);
}

export function highlightElement(element) {
  hljs.highlightElement(element);
}
