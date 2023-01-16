import { Composer, I18n, VueI18n } from "@intlify/vue-i18n-core";
import { definePlugin } from "@hybridly/core";
import { useTypedProperty } from "@hybridly/vue";

export function hybridlyLocaleSwitcher(options: HybridlyLocaleSwitcherOptions) {
  return definePlugin({
    name: "hybridly-locale-switcher:set-locale",
    navigated() {
      const currentLocale = useTypedProperty<string>(
        "hybridlyLocaleSwitcher.currentLocale"
      );

      if (options.i18nInstance.mode === "legacy") {
        (options.i18nInstance.global as VueI18n).locale = currentLocale.value;
      } else {
        (options.i18nInstance.global as Composer).locale.value = currentLocale.value;
      }
    },
  });
}

interface HybridlyLocaleSwitcherOptions {
  i18nInstance: I18n
}
