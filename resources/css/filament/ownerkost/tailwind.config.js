import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Ownerkost/**/*.php',
        './resources/views/filament/ownerkost/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
