import { ref } from "vue";

export function useClipboard (text) {
  let copied = ref(false);
  // let supported = Boolean(navigator && navigator.clipboard);
  let supported = navigator && 'clipboard' in navigator;

  let copy = () => {
    if (supported) {
      navigator.clipboard.writeText(text);

      copied.value = true;
      // setTimeout(() => {
      //   copied.value = false;
      // }, 2000);

      return;
    }
    alert('Apologies, but your browser does not support this feature.');
  }


  return { copy, copied, supported };
}
