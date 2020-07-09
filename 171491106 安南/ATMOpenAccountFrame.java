package atm;
import java.awt.Dimension;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ATMOpenAccountFrame extends JFrame{
	private JLabel jlOpenPasswd1,jlOpenPasswd2,jlName,jlPersonId,jlType;
	private JTextField jtOpenPasswd1,jtOpenPasswd2,jtName,jtPersonId,jtType;
	private JButton jbOK;
	private JPanel jp1,jp2,jp3,jp4,jp5,jp6;
	
	
	private Bank bank;
	
	public ATMOpenAccountFrame(){
		
		bank=new Bank();
		jlOpenPasswd1=new JLabel("�˻�����:");
		jlOpenPasswd2=new JLabel("ȷ������:");
		jlName=new JLabel("�˻�����:");
		jlPersonId=new JLabel("���֤��:");
		jlType=new JLabel("�˻�����(0.���� 1.����):");
		jtOpenPasswd1=new JTextField(20);
		jtOpenPasswd2=new JTextField(20);
		jtName=new JTextField(20);
		jtPersonId=new JTextField(20);
		jtType=new JTextField(12);
		jbOK=new JButton("ע��ȷ��");
		jp1=new JPanel();
		jp2=new JPanel();
		jp3=new JPanel();
		jp4=new JPanel();
		jp5=new JPanel();
		jp6=new JPanel();
		jp1.add(jlOpenPasswd1);
		jp1.add(jtOpenPasswd1);
		jp2.add(jlOpenPasswd2);
		jp2.add(jtOpenPasswd2);
		jp3.add(jlName);
		jp3.add(jtName);
		jp4.add(jlPersonId);
		jp4.add(jtPersonId);
		jp5.add(jlType);
		jp5.add(jtType);
		jp6.add(jbOK);
		//��ÿ��������ӵ�frame��
		this.add(jp1);
		this.add(jp2);
		this.add(jp3);
		this.add(jp4);
		this.add(jp5);
		this.add(jp6);
		this.setLayout(new GridLayout(6, 1));//ȡ��Ĭ�Ϲ�����,����Ϊ3��1�е����񲼾�
		Dimension d=Toolkit.getDefaultToolkit().getScreenSize();
		this.setTitle("ע�����");
		this.setBounds((d.width-300)/2, (d.height-200)/2, 300, 200);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//���ùرմ���ʱJVMͬʱ�Ƴ�
		this.pack();//�����������������������С�ߴ�
		this.setVisible(true);//���ô��ڿɼ�
		this.setResizable(false);//�������
		
		//ʹ�������ڲ������ťע�������
		jbOK.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					bank.openAccount(jtOpenPasswd1.getText(), jtOpenPasswd2.getText(),
							jtName.getText(), jtPersonId.getText(), jtType.getText());
					bank.saveAccountDate();
					dispose();//�رմ���
				}
			}	
		);
	}
}

