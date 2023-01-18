import { Composer, I18n, VueI18n } from "vue-i18n";
import { definePlugin, Plugin } from "hybridly";

export function hybridlyLocaleSwitcher(
  options: HybridlyLocaleSwitcherOptions
): Plugin {
  return definePlugin({
    name: "hybridly-locale-switcher:set-locale",
    navigated(_, context) {
      const props = context.view.properties.hybridlyLocaleSwitcher;
      if (typeof props !== "object" || props === null || Array.isArray(props))
        return;
      if (typeof props.currentLocale !== "string") return;

      if (options.i18nInstance.mode === "legacy") {
        (options.i18nInstance.global as VueI18n).locale = props.currentLocale;
      } else {
        (options.i18nInstance.global as Composer).locale.value =
          props.currentLocale;
      }
    },
  });
}

interface HybridlyLocaleSwitcherOptions {
  i18nInstance: I18n;
}
