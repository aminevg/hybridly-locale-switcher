import { Composer, I18n, VueI18n } from "@intlify/vue-i18n-core";
import { definePlugin } from "@hybridly/core";
import { useTypedProperty } from "@hybridly/vue";

export function hybridlyLocaleSwitcher(i18nInstance: I18n) {
  return definePlugin({
    name: "hybridly-locale-switcher:set-locale",
    navigated() {
      const currentLocale = useTypedProperty<string>(
        "hybridlyLocaleSwitcher.currentLocale"
      );

      if (i18nInstance.mode === "legacy") {
        (i18nInstance.global as VueI18n).locale = currentLocale.value;
      } else {
        (i18nInstance.global as Composer).locale.value = currentLocale.value;
      }
    },
  });
}
