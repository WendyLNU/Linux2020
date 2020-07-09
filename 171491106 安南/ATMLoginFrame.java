package atm;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ATMLoginFrame extends JFrame{

	private JLabel jblCardNo,jblPasswd;
	private JTextField jtfCardNo,jtfPasswd;
	private JButton jbOk,jbCancel,jbOpenAccount;
	private JPanel jp1,jp2,jp3,jp4;
	private Bank bank;
	public ATMLoginFrame(){
		bank=new Bank();

		jblCardNo=new JLabel("�û���:");
		jblPasswd=new JLabel("��    ��:");
		jtfCardNo=new JTextField(20);
		jtfPasswd=new JTextField(20);
		jbOk=new JButton("ȷ��");
		jbCancel=new JButton("ȡ��");
		jbOpenAccount=new JButton("û���˻�������");
		jp1=new JPanel();
		jp2=new JPanel();
		jp3=new JPanel();
		jp4=new JPanel();
		jp1.add(jblCardNo);
		jp1.add(jtfCardNo);
		jp2.add(jblPasswd);
		jp2.add(jtfPasswd);
		jp3.add(jbOk);
		jp3.add(jbCancel);
		jp4.add(jbOpenAccount);
		//��ÿ��������ӵ�frame��
		this.add(jp1);
		this.add(jp2);
		this.add(jp3);
		this.add(jp4);
		this.setLayout(new GridLayout(4, 1));
		Dimension d=Toolkit.getDefaultToolkit().getScreenSize();
		this.setTitle("��½����");
		this.setBounds((d.width-300)/2, (d.height-200)/2, 300, 200);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//���ùرմ���ʱJVMͬʱ�Ƴ�
		this.pack();//�����������������������С�ߴ�
		this.setVisible(true);//���ô��ڿɼ�
		this.setResizable(false);//�������
		
		//ʹ�������ڲ����2����ťע�������
		jbCancel.addActionListener(
			new ActionListener(){
				public void actionPerformed(ActionEvent e) {
					dispose();//�رմ���
				}
			}
		);
		jbOk.addActionListener(
			new ActionListener(){
				public void actionPerformed(ActionEvent e) {
					//ȡ���û�����������û���������
					long cardNo=Integer.parseInt(jtfCardNo.getText());
					String passwd=jtfPasswd.getText();
					Account account=bank.verifyAccount(cardNo, passwd);
					if(account!=null)//������ȷ,�����������
					{
						ATMMainFrame mainFrame=new ATMMainFrame(bank,account);//�����������
						dispose();//�رյ�½����
					}else{//�������,ʹ�öԻ�����ʾ������Ϣ
						JOptionPane.showMessageDialog(null, "���Ż��������", "��Ϣ��ʾ",JOptionPane.ERROR_MESSAGE);
					}
					
					
					
				}
			}
		);
		jbOpenAccount.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					ATMOpenAccountFrame openFram=new ATMOpenAccountFrame();
					dispose();//�رյ�½����
				}
			}
		);
		
		
		
	}
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		ATMLoginFrame atm=new ATMLoginFrame();

	}

}
