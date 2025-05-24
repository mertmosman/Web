function isOver13(birthDate) {
    const today = new Date();
    const birth = new Date(birthDate);
    let age = today.getFullYear() - birth.getFullYear();
    const monthDiff = today.getMonth() - birth.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
        age--;
    }
    return age >= 13;
}

function handleSubmitWithJS(event) {
    event.preventDefault(); // Formun varsayılan davranışını engelle

    // Form verilerini al
    const formData = new FormData(document.getElementById('contactForm'));

    // İsim alanı boş mu kontrol et
    if (!formData.get('name')) {
        alert('Lütfen isminizi girin');
        return;
    }

    // E-posta alanı boş mu ve geçerli bir e-posta mı kontrol et
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!formData.get('email') || !emailPattern.test(formData.get('email'))) {
        alert('Lütfen geçerli bir e-posta adresi girin');
        return;
    }

    // Telefon alanı boş mu ve sadece rakamlardan oluşuyor mu kontrol et
    const phonePattern = /^\d+$/;
    const phoneValue = formData.get('phone');
    if (phoneValue === '') {
        alert('Lütfen telefon numaranızı girin');
        return;
    } else if (!phonePattern.test(phoneValue)) {
        alert('Telefon numarası sadece rakamlardan oluşmalıdır');
    return;
}
    // Mesaj alanı boş mu kontrol et
    if (!formData.get('message')) {
        alert('Lütfen bir mesaj girin');
        return;
    }

    // İş durumu seçilmiş mi kontrol et
    if (!formData.get('jobStatus')) {
        alert('Lütfen iş durumunuzu seçin');
        return;
    }

    // Cinsiyet seçilmiş mi kontrol et
    if (formData.get('gender') === 'belirtmek istemiyorum') {
        alert('Lütfen cinsiyetinizi seçin');
        return;
    }

    // Doğum tarihi seçilmiş mi ve 13 yaşından büyük mü kontrol et
    const birthDate = formData.get('birthDate');
    if (!birthDate || !isOver13(birthDate)) {
        alert('13 yaşından büyük olmalısınız');
        return;
    }

    // Formu gönder
    document.getElementById('contactForm').submit();
}

function handleClearForm() {
    document.getElementById('contactForm').reset();
}


new Vue({
    el: '#app',
    methods: {
        isOver13(birthDate) {
            const today = new Date();
            const birth = new Date(birthDate);
            let age = today.getFullYear() - birth.getFullYear();
            const monthDiff = today.getMonth() - birth.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
                age--;
            }
            return age >= 13;
        },
        handleSubmitWithVue(event) {
            event.preventDefault(); // Formun varsayılan davranışını engelle

            // Form verilerini al
            const formData = new FormData(document.getElementById('contactForm'));

            // İsim alanı boş mu kontrol et
            if (!formData.get('name')) {
                alert('Lütfen isminizi girin');
                return;
            }

            // E-posta alanı boş mu ve geçerli bir e-posta mı kontrol et
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!formData.get('email') || !emailPattern.test(formData.get('email'))) {
                alert('Lütfen geçerli bir e-posta adresi girin');
                return;
            }

            // Telefon alanı boş mu, sadece rakamlardan oluşuyor mu ve 10 haneli mi kontrol et
            const phonePattern = /^\d{10}$/;
            if (!formData.get('phone') || !phonePattern.test(formData.get('phone'))) {
                alert('Lütfen geçerli bir telefon numarası girin (örneğin: 5551234567)');
                return;
            }

            // Mesaj alanı boş mu kontrol et
            if (!formData.get('message')) {
                alert('Lütfen bir mesaj girin');
                return;
            }

            // İş durumu seçilmiş mi kontrol et
            if (!formData.get('jobStatus')) {
                alert('Lütfen iş durumunuzu seçin');
                return;
            }

            // Cinsiyet seçilmiş mi kontrol et
            if (formData.get('gender') === 'belirtmek istemiyorum') {
                alert('Lütfen cinsiyetinizi seçin');
                return;
            }

            // Doğum tarihi seçilmiş mi ve 13 yaşından büyük mü kontrol et
            const birthDate = formData.get('birthDate');
            if (!birthDate || !this.isOver13(birthDate)) {
                alert('13 yaşından büyük olmalısınız');
                return;
            }

            // Formu gönder
            document.getElementById('contactForm').submit();
        }
    }
});
