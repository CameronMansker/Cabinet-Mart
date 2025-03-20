
const ContactMap = () => {
  return (
    <div className="h-[400px] w-full bg-gray-200 relative">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.6818546591506!2d-93.25813612392757!3d37.16947224708982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cf62c8066cd20f%3A0xf54b8a269263a7c6!2s2010%20E%20Blaine%20St%2C%20Springfield%2C%20MO%2065803%2C%20USA!5e0!3m2!1sen!2s!4v1718218542980!5m2!1sen!2s"
        width="100%"
        height="100%"
        style={{ border: 0 }}
        allowFullScreen
        loading="lazy"
        referrerPolicy="no-referrer-when-downgrade"
        title="Fabuwood Location"
      ></iframe>
    </div>
  );
};

export default ContactMap;
