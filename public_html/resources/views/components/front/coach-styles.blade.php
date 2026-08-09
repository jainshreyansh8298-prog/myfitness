<style>
    .coaches-section .coach-slide {
        padding: 0 12px;
        height: 100%;
    }
    .coaches-section .coach-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--color-border, rgba(255, 255, 255, 0.08));
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .coaches-section .coach-card:hover {
        transform: translateY(-6px);
        border-color: var(--brand-primary, #dfff00);
    }
    .coaches-section .coach-photo-wrap {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.05);
    }
    @media (max-width: 576px) {
        .coaches-section .coach-photo-wrap { height: 220px; }
    }
    .coaches-section .coach-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .coaches-section .coach-card:hover .coach-photo {
        transform: scale(1.06);
    }
    .coaches-section .coach-body {
        padding: 14px 16px;
        text-align: center;
    }
    .coaches-section .coach-name {
        font-size: 1.05rem;
        font-weight: 800;
        margin: 0;
    }
    .coaches-section .coach-title {
        color: var(--brand-primary, #dfff00);
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 3px;
    }
    .coaches-section .coach-bio {
        font-size: 0.82rem;
        opacity: 0.7;
        margin-top: 8px;
    }
    .coaches-section .coach-socials {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 12px;
    }
    .coaches-section .coach-socials a {
        color: var(--color-text, #fafafa);
        font-size: 0.95rem;
        transition: color 0.2s ease;
    }
    .coaches-section .coach-socials a:hover {
        color: var(--brand-primary, #dfff00);
    }
    /* Slick track: force equal-height slides so cards align */
    .coaches-section .services-slider .slick-track {
        display: flex;
    }
    .coaches-section .services-slider .slick-slide {
        height: auto;
    }
    .coaches-section .services-slider .slick-slide > div {
        height: 100%;
    }
</style>
